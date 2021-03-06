@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="col-12">
                                <th>#</th>
                                <th class="col-3">Question</th>
                                <th class="col-1" >Voter 1</th>
                                <th class="col-1" >Voter 2</th>
                                <th class="col-1" >Voter 3</th>
                                <th class="col-1" >Voter 4</th>
                                <th class="col-1" >Voter 5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soalan as $indexKey => $obj)
                                <tr>
                                    <th>{{ $indexKey+1 }}</th>
                                    <td class="col-3">{{ $obj["question"] }}</td>
                                    @foreach ($obj["question_recipients"] as $recipient)
                                        <td class="col-1">{{ $recipient["answer"] }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- @foreach ($soalan as $obj)
                        <p>
                            {{ $obj["question"] }}
                        </p>
                        <p>
                            {{ $obj["question_recipients"] }}
                        </p>
                    @endforeach --}}
                    
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
