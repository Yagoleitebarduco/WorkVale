@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <a href="{{ route('company.jobs.index') }}" class="text-gray-500 hover:text-gray-800 mb-4 inline-block"><i class="fas fa-arrow-left mr-2"></i>Voltar</a>
    <h1 class="text-2xl font-bold mb-6">Nova Vaga</h1>
    <form action="{{ route('company.jobs.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="bg-white p-5 rounded-xl border">
            <input name="title" placeholder="Título da Vaga *" required class="w-full p-3 border rounded-lg mb-3 focus:ring-2 focus:ring-[#6A2698]/30 outline-none">
            <div class="grid grid-cols-2 gap-3 mb-3">
                <select name="employment_type" required class="p-3 border rounded-lg bg-white"><option value="full-time">Tempo Integral</option><option value="part-time">Meio Período</option><option value="freelance">Freelance</option></select>
                <select name="modality" required class="p-3 border rounded-lg bg-white"><option value="remote">Remoto</option><option value="hybrid">Híbrido</option><option value="onsite">Presencial</option></select>
            </div>
            <input name="location" placeholder="Localização (opcional)" class="w-full p-3 border rounded-lg mb-3">
            <textarea name="description" placeholder="Descrição da Vaga *" required rows="4" class="w-full p-3 border rounded-lg resize-none"></textarea>
            <div class="grid grid-cols-2 gap-3 mt-3">
                <input type="number" name="salary_min" placeholder="Salário Mínimo" step="0.01" class="p-3 border rounded-lg">
                <input type="number" name="salary_max" placeholder="Salário Máximo" step="0.01" class="p-3 border rounded-lg">
            </div>
        </div>
        <button type="submit" class="w-full bg-[#6A2698] text-white py-3 rounded-lg font-medium hover:bg-[#5A1D80] transition">Publicar Vaga</button>
    </form>
</div>
@endsection