<?php

namespace App\Http\Controllers;

use App\Models\sponsor;
use App\Models\userInfo;
use App\Models\bootcamps;
use App\Models\Challenge;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use App\Models\resourceBootcamp;
use Illuminate\Support\Facades\Storage;
use App\Models\challenge_filter_category;

class bootcampController extends Controller
{
    public function index()
    {
        return view('admin.bootcamp.panelBootcamp');
    }

    public function bootcampCategory()
    {
        $category = challenge_filter_category::paginate(10);
        return view('admin.bootcamp.categoryBootcamp.categoryBootcamp', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        challenge_filter_category::create($request->all());
        return redirect()->route('bootcampCategory')->with('success', 'Categoria creada correctamente.');
    }

    public function destroy(challenge_filter_category $category)
    {
        $category->delete();
        return redirect()->route('bootcampCategory')->with('error', 'Categoria eliminada correctamente.');
    }

    public function edit($id)
    {
        $category = challenge_filter_category::findOrFail($id);
        return view('admin.bootcamp.categoryBootcamp.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = challenge_filter_category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('bootcampCategory')->with('success', 'Categoría actualizada con éxito');
    }

    public function bootcamp()
    {
        $category = challenge_filter_category::all();
        $bootcamps = bootcamps::paginate(10);
        $sponsors = sponsor::all();
        return view('admin.bootcamp.bootcampLanding.bootcamp', compact('category', 'bootcamps', 'sponsors'));
    }


    public function storebootcamp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:2000',
            'img_url' => 'nullable|image',
            'video_url' => 'nullable',
            'file' => 'nullable|mimes:pdf',
            'url_course' => 'required|string',
            'id_challenge_filter_category' => 'required|exists:challenge_filter_category,id',
            'sponsors' => 'nullable|array',
            'sponsors.*' => 'exists:sponsor,id'
        ]);

        $bootcamp = new bootcamps();
        $bootcamp->name = $request->name;
        $bootcamp->description = $request->description;
        $bootcamp->url_course = $request->url_course;
        $bootcamp->id_challenge_filter_category = $request->id_challenge_filter_category;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/pdf', $filename);
            $bootcamp->file = $filename;
        }

        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $filename);
            $bootcamp->img_url = $filename;
        }

        if ($request->hasFile('video_url')) {
            $file = $request->file('video_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $filename);
            $bootcamp->video_url = $filename;
        }

        $bootcamp->save();

        if ($request->has('sponsors')) {
            $bootcamp->sponsors()->sync($request->sponsors);
        }

        return redirect()->route('bootcamp_resources.create', ['bootcampId' => $bootcamp->id])
                     ->with('success', 'Bootcamp creado exitosamente. Ahora puede agregar recursos.');
    }

    public function createResourceBootcamp($bootcampId)
    {
        return view('admin.bootcamp.bootcampLanding.bootcampResource', compact('bootcampId'));
    }

    public function editResourceBootcamp($id)
    {
        $bootcamp = bootcamps::findOrFail($id);
        return view('admin.bootcamp.bootcampLanding.editResource', compact('bootcamp'));
    }

    public function updateResourceBootcamp(Request $request, $id)
    {
        $request->validate([
            'files.*' => 'required|file|max:50000', // Validar archivos
        ]);

        $bootcamp = bootcamps::findOrFail($id);

        // Crear una lista de IDs de recursos para asociar
        $fileIds = [];

        foreach ($request->file('files') as $file) {
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/bootcamp_resources', $filename);

            $resource = ResourceBootcamp::create([
                'url_img' => $filename,
            ]);

            $fileIds[] = $resource->id;
        }

        // Asociar los recursos con el bootcamp
        $bootcamp->resources()->sync($fileIds);

        return redirect()->route('bootcamp.index', $id)->with('success', 'Archivos subidos exitosamente.');
    }

    public function storeResourceBootcamp(Request $request, $bootcampId){

        $request->validate([
            'files.*' => 'required|file|max:50000',
        ]);

        $fileIds = [];
        foreach ($request->file('files') as $file) {
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/bootcamp_resources', $filename);

            $resource = resourceBootcamp::create([
                'url_img' => $filename,
            ]);

            $fileIds[] = $resource->id;
        }


        bootcamps::find($bootcampId)->resources()->attach($fileIds);

        return redirect()->route('bootcamp.index', $bootcampId)->with('success', 'Archivos subidos exitosamente.');

    }


    public function destroybootcamp(bootcamps $bootcamp)
    {
        $bootcamp->delete();
        return redirect()->route('bootcampLanding')->with('error', 'Bootcamp eliminada correctamente.');
    }

    public function editbootcamp($id)
    {
        $category = challenge_filter_category::all();
        $bootcamps = bootcamps::findOrFail($id);
        $sponsors = sponsor::all();
        $selectedSponsors = $bootcamps->sponsors->pluck('id')->toArray();
        return view('admin.bootcamp.bootcampLanding.edit', compact('bootcamps', 'category', 'sponsors', 'selectedSponsors'));
    }


    public function updatebootcamp(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'img_url' => 'nullable|image',
            'video_url' => 'nullable',
            'file' => 'nullable|mimes:pdf',
            'url_course' => 'required|string',
            'id_challenge_filter_category' => 'required|exists:challenge_filter_category,id',
            'sponsors' => 'nullable|array',
            'sponsors.*' => 'exists:sponsor,id'
        ]);

        $bootcamp = bootcamps::findOrFail($id);

        $bootcamp->name = $request->input('name');
        $bootcamp->description = $request->input('description');
        $bootcamp->url_course = $request->input('url_course');
        $bootcamp->id_challenge_filter_category = $request->input('id_challenge_filter_category');

        if ($request->hasFile('img_url')) {
            if ($bootcamp->img_url && Storage::exists('public/img/' . $bootcamp->img_url)) {
                Storage::delete('public/img/' . $bootcamp->img_url);
            }

            $file = $request->file('img_url');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/img', $filename);
            $bootcamp->img_url = $filename;
        }

        if ($request->hasFile('video_url')) {
            if ($bootcamp->video_url && Storage::exists('public/img/' . $bootcamp->video_url)) {
                Storage::delete('public/img/' . $bootcamp->video_url);
            }

            $file = $request->file('video_url');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/img', $filename);
            $bootcamp->video_url = $filename;
        }

        if ($request->hasFile('file')) {
            if ($bootcamp->file && Storage::exists('public/pdf/' . $bootcamp->file)) {
                Storage::delete('public/pdf/' . $bootcamp->file);
            }

            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/pdf', $filename);
            $bootcamp->file = $filename;
        }

        $bootcamp->save();

        if ($request->has('sponsors')) {
            $bootcamp->sponsors()->sync($request->sponsors);
        }



        return redirect()->route('bootcamp.editResources', $id)->with('success', 'Bootcamp actualizado con éxito');
    }


    public function clientBootcamp()
    {
        $categories = challenge_filter_category::with('bootcamps')->get();

        return view('users.bootcamp', compact('categories'));
    }

    public function show($id)
    {
        $bootcamp = bootcamps::findOrFail($id);
        $sponsors = $bootcamp->sponsors ?? collect();
        $challenges = $bootcamp->challenge; 
        $resources = $bootcamp->resources ?? collect();

        return view('users.viewBootcamp', compact('bootcamp', 'sponsors', 'challenges', 'resources'));
    }

    public function bootcampSponsor()
    {
        $sponsor = sponsor::paginate(10);
        return view('admin.bootcamp.bootcampSponsor.sponsor', compact('sponsor'));
    }

    public function storeSponsor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:70',
            'description' => 'nullable|string|max:255', // Permitir que sea opcional
            'img_url' => 'nullable|image',
        ]);

        $sponsor = new Sponsor();
        $sponsor->name = $request->name;
        $sponsor->description = $request->description; // Puede ser nulo

        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $filename);
            $sponsor->img_url = $filename;
        }

        $sponsor->save();

        return redirect()->route('bootcampSponsor')->with('success', 'Institución creada exitosamente.');
    }


    public function destroySponsor(sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('bootcampSponsor')->with('error', 'Instituciones eliminada correctamente.');
    }

    public function editSponsor($id)
    {

        $sponsor = sponsor::findOrFail($id);
        return view('admin.bootcamp.bootcampSponsor.edit', compact('sponsor'));
    }

    public function updateSponsor(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $sponsor = sponsor::findOrFail($id);


        $sponsor->name = $request->input('name');
        $sponsor->description = $request->description;

        if ($request->hasFile('img_url')) {
            if ($sponsor->img_url && Storage::exists('public/img/' . $sponsor->img_url)) {
                Storage::delete('public/img/' . $sponsor->img_url);
            }

            $file = $request->file('img_url');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/img', $filename);
            $sponsor->img_url = $filename;
        }

        $sponsor->save();

        return redirect()->route('bootcampSponsor')->with('success', 'Instituciones actualizado con éxito');
    }

    public function bootcampParticipation($id){
        $bootcamp = bootcamps::findOrFail($id);
        $userId = auth()->id();

        $userInfo = userInfo::where('bootcamp_id', $id)
            ->where('user_id', $userId)
            ->first();

        $isRegistered = $userInfo && $userInfo->state_id == 1;

        return view('users.formBootcamp', compact('bootcamp', 'isRegistered'));
    }

    public function bootcampParticipationStore(Request $request, $bootcampId) {
        $request->validate([
            'commitment' => 'required|string|max:5',
        ]);

        if ($request->commitment == 'Si') {
            $userId = auth()->id();
            $userInfo = new userInfo();
            $userInfo->user_id = $userId;
            $userInfo->phone = $request->phone;
            $userInfo->profile = $request->profile;
            $userInfo->mode = $request->mode;
            $userInfo->commitment = $request->commitment;
            $userInfo->bootcamp_id = $bootcampId;
            $userInfo->state_id = 1;
            $userInfo->challenge_state_id = 2;
            $userInfo->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }

    public function bootcampParticipationindex()
    {
        $bootcamps = bootcamps::with('userInfo.user')->paginate(10);
        return view('admin.bootcamp.bootcampUsers.listUserBootcamp', compact('bootcamps'));
    }

    public function toggleChallengeState($id)
    {

        $userInfo = userInfo::findOrFail($id);


        if ($userInfo->challenge_state_id == 1) {
            $userInfo->challenge_state_id = 2;
        } else {
            $userInfo->challenge_state_id = 1;
        }
        $userInfo->save();

        return redirect()->back()->with('success', 'Estado de solucionador de retos actualizado correctamente.');
    }



    /**
     * Show the editable list of questions for the current Bootcamp (create question with modal)
     */
    public Function showChallengeSurvey(bootcamps $bootcamp){
        $questionTypes = QuestionType::all();
        $bootcamp->load('questions.questionType');
        return view('admin.bootcamp.challengeSurvey.survey', compact('bootcamp', 'questionTypes'));

    }


}
