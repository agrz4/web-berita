@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Hasil Pencarian: "{{ $query }}"</h2>
    @if($results->count())
        <ul class="space-y-4">
            @foreach($results as $news)
                @if($news && $news->title)
                <li class="border-b pb-2">
                    <a href="{{ route('news.show', $news->slug) }}" class="text-lg font-semibold text-primary-600 hover:underline">
                        {{ $news->title }}
                    </a>
                    <div class="text-sm text-gray-500">{{ $news->created_at->format('d M Y') }}</div>
                </li>
                @endif
            @endforeach
        </ul>
    @else
        <p>Tidak ada berita yang ditemukan.</p>
    @endif
</div>
@endsection 