@extends('layouts.app')

@section('content')

   <div class="container">
     <div class="row">
       <div class="col-lg-4">
         <div class="card">
           <div class="card-header">
             <h1 class="text-center">Add Faq</h1>
           </div>
           <div class="card-body">
             <form class="form-group" action="{{ url('/faq/post') }}" method="post">
               @csrf
               <div class="py-3">
                 <input class="form-control" type="text" name="faq_question" placeholder="Enter Question" value="{{ old('faq_question') }}">
                 @error ('faq_question')
                   <small class="text-danger">{{ $message }}</small>
                 @enderror
               </div>
               <div class="py-3">
                 <input class="form-control" type="text" name="faq_answer" placeholder="Enter Answer" value="{{ old('faq_answer') }}">
                 @error ('faq_answer')
                   <small class="text-danger">{{ $message }}</small>
                 @enderror
               </div>
               <div class="py-3">
                <button type="submit" class="btn btn-primary">Add Faq</button>
               </div>
               @if ($errors->all())
                 <div class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                   @endforeach
                 </div>
               @endif
             </form>
           </div>
         </div>
       </div>
       <div class="col-lg-8">
         <div class="card">
           <div class="card-header">
             <h1 class="text-center">All Faqs</h1>
           </div>
           <div class="card-body">
             <table class="table table-striped">
               <tr>
                 <th>SL</th>
                 <th>Faq Question</th>
                 <th>Faq Answer</th>
                 <th>Created at</th>
                 <th>Updated at</th>
                 <th>Action</th>
               </tr>
               @forelse ($faqs as $faq)

                 <tr>
                   <td>{{ $loop -> index +1 }}</td>
                   <td>{{ $faq->faq_question }}</td>
                   <td>{{ $faq->faq_answer }}</td>
                   <td>{{ $faq->created_at->diffForHumans() }}</td>
                   @if ($faq->updated_at)
                    <td>{{ $faq->updated_at->diffForHumans() }}</td>
                  @else
                    <td>--</td>
                   @endif

                   <td>
                     <a href="{{ url('/faq/delete') }}/{{ $faq->id }}" class="btn btn-danger">Delete</a>
                   </td>
                 </tr>
               @empty
                 <tr>
                   <td>No data found</td>
                 </tr>
               @endforelse
             </table>
           </div>
         </div>
       </div>
     </div>
   </div>


@endsection
