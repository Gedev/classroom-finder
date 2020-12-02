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

            <div class="float-right">
                @php
                    $today = actualDay();
                    toFormatDate();
                @endphp
            </div>

            <div class="schedule-table table-responsive">
                <table class="table table-fixed table-bordered">
                    <thead>
                        <tr class="text-sm-center">
                            <th scope="col">
                                <div class="blob red"></div>
                            </th>
                            <th scope="col">Lundi</th>
                            <th scope="col">Mardi</th>
                            <th scope="col">Mercredi</th>
                            <th scope="col">Jeudi</th>
                            <th scope="col">Vendredi</th>
                            <th scope="col">Samedi</th>
                            <th scope="col">Dimanche</th>
                        </tr>
                    </thead>

                    <tbody>
                    @php
                        $days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
                    @endphp
                    @for($i = 0; $i < 10; $i++)

                        <tr class="text-sm-center">
                            {{-- Print the time --}}
                            <th scope="row" class="first-col"><div>{{ $i+8 }}h</div><div>{{ $i+9 }}h</div></th>
                            @foreach($days as $day)
                                @if(array_key_exists($day,$classes))
                                    @foreach($classes[$day] as $class)
                                        @if($class['start_at'] == "08:00:00")
                                            @php
                                                $course_name[$day][8] = $class['course_name'];
                                                $course_id[$day][8] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "09:00:00")
                                            @php
                                                $course_name[$day][9] = $class['course_name'];
                                                $course_id[$day][9] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "10:00:00")
                                            @php
                                                $course_name[$day][10] = $class['course_name'];
                                                $course_id[$day][10] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "11:00:00")
                                            @php
                                                $course_name[$day][11] = $class['course_name'];
                                                $course_id[$day][11] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "12:00:00")
                                            @php
                                                $course_name[$day][12] = $class['course_name'];
                                                $course_id[$day][12] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "13:00:00")
                                            @php
                                                $course_name[$day][13] = $class['course_name'];
                                                $course_id[$day][13] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "14:00:00")
                                            @php
                                                $course_name[$day][14] = $class['course_name'];
                                                $course_id[$day][14] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "15:00:00")
                                            @php
                                                $course_name[$day][15] = $class['course_name'];
                                                $course_id[$day][15] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "16:00:00")
                                            @php
                                                $course_name[$day][16] = $class['course_name'];
                                                $course_id[$day][16] = $class['course_id'];
                                            @endphp
                                        @endif

                                        @if($class['start_at'] == "17:00:00")
                                            @php
                                                $course_name[$day][17] = $class['course_name'];
                                                $course_id[$day][17] = $class['course_id'];
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            @if($i == 0)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][8]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][8])}}">{{$course_name[$day][8]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif

                            @if($i == 1)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][9]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][9])}}">{{$course_name[$day][9]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif

                            @if($i == 2)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][10]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][10])}}">{{$course_name[$day][10]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif

                            @if($i == 3)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][11]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][11])}}">{{$course_name[$day][11]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif

                            @if($i == 4)
                                @foreach($days as $day)
                                    <td class="bg-dark"></td>
                                @endforeach
                            @endif

                            @if($i == 5)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][13]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][13])}}">{{$course_name[$day][13]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif

                            @if($i == 6)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][14]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][14])}}">{{$course_name[$day][14]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif

                            @if($i == 7)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][15]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][15])}}">{{$course_name[$day][15]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif

                            @if($i == 8)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][16]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][16])}}">{{$course_name[$day][16]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif

                            @if($i == 9)
                                @foreach($days as $day)
                                    @if(array_key_exists($day,$classes))
                                        @if(!empty($course_name[$day][17]))
                                            <td class="schedule-table-td-filled bg-success td-border-round"><a style="display:block;height:100%;color:#fff;text-decoration:none" href="{{Route('mark_attendance',$course_id[$day][17])}}">{{$course_name[$day][17]}}</a></td>
                                        @else
                                            <td class="border td-border-round"></td>
                                        @endif
                                    @else
                                        <td class="border td-border-round"></td>
                                    @endif
                                @endforeach
                            @endif
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
