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
            <h5>Schedule for the section [ Web developer Bloc 2 ]</h5>
            @if( Auth::user()->role === 'professor' )
                <label for="confirmPresence">Confirm your presence in the classroom :</label>
                <button id="confirmPresence" class="btn btn-success">Confirm</button>
            @endif

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

                @for($i = 0; $i < 10; $i++)
                    <tr class="text-sm-center">
                        {{-- Print the time --}}
                        <th><div>{{ $i+8 }}h</div><div>{{ $i+9 }}h</div></th>
                        @for($j = 1; $j < 8; $j++)

                            @if($i===4)
                                <td class="bg-dark"></td>
                            @else
                                @switch($j)
                                    @case(2)
                                        @if( array_key_exists($j, $schedule[0]["webdev_2"]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><span>{{ "ScriptClients" }}</span></td>
                                        @endif
                                        @break
                                    @case(3)
                                        @if( array_key_exists($j, $schedule[0]["webdev_2"]))
                                            <td class="schedule-table-td-filled bg-pink td-border-round">{{ "Anglais" }}</td>
                                        @endif
                                        @break

                                    @case(4)
                                        @if( array_key_exists($j, $schedule[0]["webdev_2"]))
                                            <td class="schedule-table-td-filled bg-info td-border-round">{{ "Framework_POO" }}</td>
                                        @endif
                                        @break
                                    @case(5)
                                        @if( array_key_exists($j, $schedule[0]["webdev_2"]))
                                            <td class="schedule-table-td-filled bg-orange td-border-round">{{ "Projet Web Dynamique" }}</td>
                                        @endif
                                        @break
                                    @default
                                        <td class="border td-border-round"></td>
                                @endswitch

                            @endif
                        @endfor



                    </tr>
                @endfor
            </table>
        </div>
    </div>
@endsection
