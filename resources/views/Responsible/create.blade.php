@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')
        <form action="{{ route('Responsible.store') }}"method="post"enctype="multipart/form-data" style="">
            @csrf
            số hiệu chuyến bay: <select name="flight_schedules_id" id="" class="form-control">
                @foreach ($itemp as $key => $value)
                    <option value="{{ $value->id }}">
                        VNT.{{ $value->flight_date }}.{{ $value->flight_time }}.{{ $value->id }}</option>
                @endforeach;
            </select>
            <table class="table table-striped table-">
                <tr>
                    <td>
                        cơ trưởng: <select name="captain" id=""class="form-control">
                            <option value="">vui lòng chọn </option>
                            @foreach ($captain as $key => $user)
                                <option value="{{ $user->name }}">
                                    {{ $user->name }}: {{ $user->position }}
                                </option>
                            @endforeach;
                        </select>
                    </td>
                    <td>
                        cơ phó: <select name="engine_deal" id=""class="form-control">
                            <option value="">vui lòng chọn </option>
                            @foreach ($captain as $key => $user)
                                <option value="{{ $user->name }}">
                                    {{ $user->name }}: {{ $user->position }}
                                </option>
                            @endforeach;
                        </select>
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        Tiếp viên trưởng: <select name="chief_flight_attendant" id=""class="form-control">
                            <option value="">vui lòng chọn </option>
                            @foreach ($chief_flight_attendant as $key => $user)
                                <option value="{{ $user->name }}">
                                    {{ $user->name }}: {{ $user->position }}
                                </option>
                            @endforeach;
                        </select>
                    </td>
                    <td>
                        Tiếp viên phó: <select name="deputy_attendant" id=""class="form-control">
                            <option value="">vui lòng chọn </option>
                            @foreach ($deputy_attendant as $key => $user)
                                <option value="{{ $user->name }}">
                                    {{ $user->name }}: {{ $user->position }}
                                </option>
                            @endforeach;
                        </select>
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        Tiếp viên: <select name="stewardess_1" id=""class="form-control">
                            <option value="">vui lòng chọn </option>
                            @foreach ($stewardess as $key => $user)
                                <option value="{{ $user->name }}">
                                    {{ $user->name }}: {{ $user->position }}
                                </option>
                            @endforeach;
                        </select>
                    </td>
                    <td>
                        Tiếp viên: <select name="stewardess_2" id=""class="form-control">
                            <option value="">vui lòng chọn </option>
                            @foreach ($stewardess as $key => $user)
                                <option value="{{ $user->name }}">
                                    {{ $user->name }}: {{ $user->position }}
                                </option>
                            @endforeach;
                        </select>
                    </td>
                    <td>
                        Tiếp viên:<select name="stewardess_3" id=""class="form-control">
                            <option value="">vui lòng chọn </option>
                            @foreach ($stewardess as $key => $user)
                                <option value="{{ $user->name }}">
                                    {{ $user->name }}: {{ $user->position }}
                                </option>
                            @endforeach;
                        </select>
                    </td> 
                   
                </tr>
            </table>

            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
