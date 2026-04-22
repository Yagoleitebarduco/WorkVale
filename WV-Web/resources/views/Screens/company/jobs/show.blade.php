@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-6" x-data="{ modal: false, cand: {} }">
    <div class="grid md:grid-cols-3 gap-6">
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-xl border">
                <div class="flex justify-between items-start mb-4">
                    <div><h1 class="text-2xl font-bold">{{ $job->title }}</h1><p class="text-sm text-gray-500">Publicada em {{ $job->published_at?->format('d/m/Y') }}</p></div>
                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $job->status_badge }}">{{ $job->status_label }}</span>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                    <div class="bg-gray-50 p-3 rounded-lg"><p class="text-xs text-gray-500">Modalidade</p><p class="font-medium">{{ $job->modality_label }}</p></div>
                    <div class="bg-gray-50 p-3 rounded-lg"><p class="text-xs text-gray-500">Tipo</p><p class="font-medium">{{ $job->employment_type_label }}</p></div>
                    <div class="bg-gray-50 p-3 rounded-lg"><p class="text-xs text-gray-500">Salário</p><p class="font-medium">R$ {{ $job->salary_min ?? '0' }} - {{ $job->salary_max ?? '0' }}</p></div>
                </div>
                <div class="prose max-w-none text-gray-700">{!! nl2br(e($job->description)) !!}</div>
            </div>
        </div>
        <div class="space-y-4">
            <div class="bg-white p-5 rounded-xl border">
                <h3 class="font-semibold mb-3">Candidatos ({{ $job->applications->count() }})</h3>
                <div class="space-y-3 max-h-96 overflow-y-auto">
                    @foreach($job->applications as $app)
                    <div @click="modal=true; cand={name:'{{ $app->user->name ?? 'Candidato' }}', stage:'{{ $app->stage_label }}', badge:'{{ $app->stage_badge }}', skills:'{{ implode(', ', $app->skills ?? []) }}', cover:'{{ substr($app->cover_letter,0,100) }}...'}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer border">
                        <div class="w-10 h-10 rounded-full bg-[#E2D4F0] flex items-center justify-center text-[#6A2698] font-bold">{{ strtoupper(substr($app->user->name ?? 'C',0,1)) }}</div>
                        <div class="flex-1"><p class="font-medium text-sm">{{ $app->user->name ?? 'Anônimo' }}</p><p class="text-xs text-gray-500">{{ $app->stage_label }}</p></div>
                        <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('company.jobs.edit', $job) }}" class="flex-1 text-center py-2 border rounded-lg hover:bg-gray-50">Editar</a>
                <form action="{{ route('company.jobs.destroy', $job) }}" method="POST" class="flex-1" onsubmit="return confirm('Excluir vaga?')">
                    @csrf @method('DELETE')
                    <button class="w-full py-2 border border-red-200 text-red-600 rounded-lg hover:bg-red-50">Excluir</button>
                </form>
            </div>
        </div>
    </div>
    <div x-show="modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50" @click.self="modal=false" x-transition>
        <div class="bg-white rounded-2xl w-full max-w-md p-6 relative" @click.stop>
            <button @click="modal=false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
            <div class="flex items-center gap-4 mb-4">
                <div class="w-14 h-14 rounded-full bg-[#6A2698] text-white flex items-center justify-center text-xl font-bold" x-text="cand.name.charAt(0)"></div>
                <div><h3 class="font-bold text-lg" x-text="cand.name"></h3><span class="text-xs px-2 py-1 rounded-full" :class="cand.badge" x-text="cand.stage"></span></div>
            </div>
            <p class="text-sm text-gray-600 mb-4" x-text="cand.cover"></p>
            <div class="mb-4"><p class="text-xs font-semibold text-gray-500 mb-1">Skills</p><div class="flex flex-wrap gap-2"><template x-for="s in cand.skills.split(', ')"><span class="px-2 py-1 bg-gray-100 rounded text-xs" x-text="s"></span></template></div></div>
            <div class="flex gap-3 pt-4 border-t">
                <button class="flex-1 py-2 bg-[#6A2698] text-white rounded-lg hover:bg-[#5A1D80]">Agendar Entrevista</button>
                <button class="px-4 py-2 border border-red-200 text-red-600 rounded-lg hover:bg-red-50"><i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection