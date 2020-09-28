@extends('layouts.app')

@section('content')
    <div class="bodyContent row justify-content-center">
        <div class="col-md-8">
            <p>
            <div class="alert-light">
                <div class="first-letter-title">H</div>
                <div class="title">omepage</div>
            </div>
            </p>
            @php
                $mytime = Carbon\Carbon::now();
                $mytime->setTimezone('GMT+2');
                $currentDay = $mytime->isoFormat('d');

                echo $mytime->locale('fr')->isoFormat('dddd, Do MMMM YYYY, HH:mm');
            @endphp

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Lundi</th>
                        <th scope="col">Mardi</th>
                        <th scope="col">Mercredi</th>
                        <th scope="col">Jeudi</th>
                        <th scope="col">Vendredi</th>
                        <th scope="col">Samedi</th>
                        <th scope="col">Dimanche</th>
                    </tr>
                </thead>
                @for($i = 0; $i < 10; $i++)
                    <tr>
                        <th>{{ $i+8 }}h-{{ $i+9 }}h</th>
                        @for($j = 1; $j < 8; $j++)
                            @if($i == 4)
                                <td class="table-dark"></td>
                            @else
                            {{-- Get current day --}}
                                @if($j == $currentDay)
                                    <td class="bg-info"></td>
                                @else
                                    <td></td>
                                @endif
                            @endif
                        @endfor
                    </tr>
                @endfor
            </table>
        </div>
    </div>
@endsection
