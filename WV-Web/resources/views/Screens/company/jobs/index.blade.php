@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Minhas Vagas</h1>
        <a href="{{ route('company.jobs.create') }}" class="bg-[#6A2698] text-white px-4 py-2 rounded-lg hover:bg-[#5A1D80]">+ Nova Vaga</a>
    </div>
    @if($jobs->count())
    <div class="bg-white rounded-xl border shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-xs uppercase text-gray-500"><tr><th class="p-4">Vaga</th><th class="p-4 hidden md:table-cell">Modalidade</th><th class="p-4">Candidatos</th><th class="p-4">Status</th><th class="p-4 text-right">Ações</th></tr></thead>
            <tbody class="divide-y">
                @foreach($jobs as $job)
                <tr class="hover:bg-gray-50">
                    <td class="p-4"><p class="font-medium">{{ $job->title }}</p><p class="text-xs text-gray-500">{{ $job->published_at?->format('d/m/Y') }}</p></td>
                    <td class="p-4 hidden md:table-cell text-sm">{{ $job->modality_label }}</td>
                    <td class="p-4 font-medium">{{ $job->applications_count }}</td>
                    <td class="p-4"><span class="text-xs px-2 py-1 rounded-full {{ $job->status_badge }}">{{ $job->status_label }}</span></td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('company.jobs.show', $job) }}" class="text-[#6A2698] hover:underline text-sm">Ver</a>
                        <a href="{{ route('company.jobs.edit', $job) }}" class="text-gray-400 hover:text-gray-600 text-sm">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $jobs->links() }}</div>
    @else
    <div class="bg-white rounded-xl border shadow-sm p-8 text-center">
        <p class="text-gray-500 mb-4">Nenhuma vaga cadastrada.</p>
        <a href="{{ route('company.jobs.create') }}" class="bg-[#6A2698] text-white px-4 py-2 rounded-lg hover:bg-[#5A1D80]">Criar Vaga</a>
    </div>
    @endif
</div>
@endsection