@extends('layouts.user')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <!-- Search Box -->
        <div class="row mb-4">
            <div class="col-12 col-md-6 offset-md-3">
                <form method="GET" action="{{ route('user.list-psikolog') }}" class="d-flex">
                    <!-- Dropdown for Spesialis -->
                    <div class="input-group">
                        <select name="spesialis_id" class="form-select">
                            <option value="" {{ request()->spesialis_id == '' ? 'selected' : '' }}>Tampil Semua</option>
                            @foreach($spesialis as $item)
                                <option value="{{ $item->id }}" {{ request()->spesialis_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->spesialis }}
                                </option>
                            @endforeach
                        </select>
                        <!-- Search Button -->
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        

        <!-- Row for cards -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($psikologs as $psikolog)
                <div class="col">
                    <div class="card h-100 shadow-sm border-light">
                        <!-- Card Header with Fixed Image Size -->
                        <img src="{{ asset('storage/' . $psikolog->gambar) }}" class="card-img-top" alt="{{ $psikolog->psikolog }}" style="object-fit: cover; height: 200px;">
                        
                        <div class="card-body d-flex flex-column">
                            <!-- Name and Specialization -->
                            <h5 class="card-title text-center">{{ $psikolog->psikolog }}</h5>
                            <p class="text-muted text-center">{{ $psikolog->spesialis->spesialis }}</p>

                            <!-- Graduate Info -->
                            <div class="mb-3">
                                <strong>Lulusan:</strong> {{ $psikolog->lulusan }}<br>
                                <strong>Tahun Lulus:</strong> {{ $psikolog->tahun_lulus }}
                            </div>

                            <!-- Schedule -->
                            <h6 class="card-subtitle mb-2 text-muted">Jadwal</h6>
                            <div class="jadwal-list">
                                @foreach($psikolog->jadwal as $jadwal) <!-- Limiting to 3 items -->
                                    <ul class="list-unstyled">
                                        <li><strong>{{ $jadwal->hari }}</strong>: {{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai)->format('H:i') }}</li>
                                    </ul>
                                @endforeach
                            </div>

                            <!-- Button to view more -->
                            <a href="/user/list-psikolog/{{ $psikolog->id }}/form-booking" class="btn btn-primary w-100 mt-auto">Booking</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
