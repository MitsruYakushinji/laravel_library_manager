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
                                    <tr>
                                        <td>{{ $log->library->name }}</td>
                                        <td>{{ $log->rent_date }}</td>
                                        @if (is_null($log->return_date))
                                            <td>-</td>
                                        @else
                                            <td>{{ $log->return_date }}</td>
                                        @endif
                                    </tr>
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
