@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Painel da Empresa</h1>
        <a href="{{ route('company.jobs.create') }}" class="bg-[#6A2698] text-white px-4 py-2 rounded-lg hover:bg-[#5A1D80] transition"><i class="fas fa-plus mr-2"></i>Nova Vaga</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border shadow-sm"><p class="text-sm text-gray-500">Vagas Ativas</p><p class="text-2xl font-bold">{{ $activeJobs }}</p></div>
        <div class="bg-white p-4 rounded-xl border shadow-sm"><p class="text-sm text-gray-500">Candidatos</p><p class="text-2xl font-bold">{{ $totalCandidates }}</p></div>
        <div class="bg-white p-4 rounded-xl border shadow-sm"><p class="text-sm text-gray-500">Entrevistas</p><p class="text-2xl font-bold">{{ $interviewsCount }}</p></div>
    </div>
    <div class="bg-white p-4 rounded-xl border shadow-sm">
        <h2 class="font-semibold mb-3">Vagas Recentes</h2>
        @forelse($recentJobs as $job)
            <div class="flex justify-between items-center py-3 border-b last:border-0">
                <div><p class="font-medium">{{ $job->title }}</p><p class="text-xs text-gray-500">{{ $job->modality_label }}</p></div>
                <span class="text-xs px-2 py-1 rounded-full {{ $job->status_badge }}">{{ $job->status_label }}</span>
            </div>
        @empty <p class="text-center text-gray-500 py-4">Nenhuma vaga cadastrada.</p> @endforelse
    </div>
</div>
@endsection