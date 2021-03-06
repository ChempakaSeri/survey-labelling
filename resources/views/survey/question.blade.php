@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionRecipients->total()}} questions remaining</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($questionRecipients)> 0)
                        <form method="POST" action="{{ url('/vote') }}">
                            {{ csrf_field() }}
                            @foreach ($questionRecipients as $questionRecipient)
                            <div class="form-group">
                                <label for="question[{{$questionRecipient->question->id}}]">"{{$questionRecipient->question->question}}"</label>
                                <select class="form-control" name="question[{{$questionRecipient->question->id}}]" required>
                                    <option disabled selected value> -- Select an emotion -- </option>
                                    <option value="3">Excited</option>
                                    <option value="5">Bored</option>
                                    <option value="6">Relax</option>
                                </select>
                            </div>
                            @endforeach

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </form>
                    @else
                        <p> You have answer all questions. Thank you for completing this survey. </p>
                        <div class="text-center">
                            <a role="button" class="btn btn-primary" href="{{ route('home') }}">Home</a>
                        </div>
                    @endif
                    {{-- <div class="text-center" style="margin: auto;">
                        {{ $questions->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
