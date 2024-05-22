@extends('main')
@include('sidebar')
@include('footer')
@section('contents')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle"></button>
                <span class="navbar-brand" id="page-title">Book List</span>
            </div>
        </div>
    </nav>
    <div id="area-book-list" class="area content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Library</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                    <th>書籍名</th>
                                    <th>貸出日</th>
                                    <th>返却日</th>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                        @foreach ($libraries as $library)
                                            @if ($log->user_id === Auth::id() && $log->library_id === $library->id)
                                                <tr>
                                                    <td>{{ $library->name }}</td>
                                                    <td>{{ $log->rent_date }}</td>
                                                    @if ($log->return_date !== null)
                                                        <td>{{ $log->return_date }}</td>
                                                    @else
                                                        <td>-</td>
                                                    @endif
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
