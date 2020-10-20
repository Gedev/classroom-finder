@extends('layouts.app')

@section('content')
    <div class="bodyContent row justify-content-center">
        <div class="col-md-12">
            <p>
            <div class="globalTitle alert-light">
                <div class="first-letter-title">H</div>
                <div class="title">omepage</div>
            </div>
            </p>

            @if( Auth::user()->role === 'professor' )
                <label for="confirmPresence">Confirm your presence in the classroom :</label>
                <button id="confirmPresence" class="btn btn-success">Confirm</button>
            @endif
            {{ var_dump(minutesToHours($schedule[0]["webdev_2"]["wednesday"]["anglais"]["debut"])) }}
            <div class="float-right">
                @php
                    $today = actualDay();
                    toFormatDate();
                @endphp
            </div>

            <table class="table table-responsive-sm table-bordered">
                <thead>
                    <tr class="text-sm-center">
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
                {{-- Print all time --}}
                @for($i = 0; $i < 10; $i++)
                    <tr class="text-sm-center">
                        <th><div>{{ $i+8 }}h</div><div>{{ $i+9 }}h</div></th>
                        @for($j = 1; $j < 8; $j++)
                            @if($i == 4)
                                <td class="table-dark"></td>
                            @else

                            {{--Get current day--}}
                                @if($j == $today)
                                    <td class="bg-info"></td>
                                @else
                                    @if(isset($schedule[0]["webdev_2"]["wednesday"]["anglais"]["debut"]) && $schedule[0]["webdev_2"]["wednesday"] === $today))
                                        <td class="bg-success">{{ $schedule[0]["webdev_2"]["wednesday"] }}</td>
                                    @endif
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
