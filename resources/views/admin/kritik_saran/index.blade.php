@extends('layout.appadmin')
@section('title', 'Kritik & Saran')
@section('styles')
    <style>
        .notif {
            background-color: rgb(26, 219, 26);
            text-alig
        }
    </style>
@endsection
@section('content')
    <div class="container py-4">
    <h4 class="mb-3">Kritik & Saran</h4>

    @foreach ($kritik as $item)
    <a href="{{ route('kritik.saran.detail', $item->id) }}" class="text-decoration-none text-dark">
        <div class="card mb-2 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <strong>{{ $item->nama }}</strong>
                    <div class="text-muted small">
                        {{ Str::limit($item->pesan, 35) }}
                    </div>
                </div>

                @if(!$item->read_at)
                    <span class="notif badge rounded-pill">BARU</span>
                @endif

            </div>
        </div>
    </a>
    @endforeach
</div>

@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function (){
            let current = window.location.pathname.split("/").pop();
            let links = document.querySelectorAll(".sidebar .nav-link");

            links.forEach(link => {
                let href = link.getAttribute("href");
                if(href.includes(current)) {
                    link.classList.add("active-nav");
                } else {
                    link.classList.remove("active-nav");
                }
            });
        });
    </script>
@endsection