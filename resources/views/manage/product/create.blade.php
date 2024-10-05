@extends('manage.layout')
@section('title', __('Create'))

@section('content')
<link href="https://cdn.jsdelivr.net/npm/use-bootstrap-tag@2.2.2/dist/use-bootstrap-tag.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/use-bootstrap-tag@2.2.2/dist/use-bootstrap-tag.min.js"></script>


    <h1>{{ __('Create') }}</h1>
    <div class="row">
        <div class="col-12 col-xl-4">
            <form action="{{ route($_routeBase . 'store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="SKU">{{ __('SKU') }}</label>
                    <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku" value="{{ old('sku') }}">
                    @error('sku')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="price">{{ __('Price') }}</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price') }}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror   
                </div>
                <div class="form-group mb-2">
                    <label for="category_id">{{ __('Category') }}</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                        <option value="">{{ __('Top Level') }}</option>
                        @foreach ($categories as $object)
                            <option value="{{ $object->id }}">{{ $object->name }}</option>
                        @endforeach
                    </select>   
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>  

                <div class="form-group mb-2">
                    <label for="tags">{{ __('Tags') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" list="tagSearchList" autocomplete="off" placeholder="{{__('Search')}}" id="tagSearchInput" aria-label="{{__('Search')}}" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" onclick="addTag('tagSearchInput','tags')" id="button-addon2">{{__('Add')}}</button>
                        <datalist id="tagSearchList">
                        </datalist>
                    </div>
                    <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" id="tags" value="{{ old('tags') }}">
                    @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>


                <script>
                    const tagInput=UseBootstrapTag(document.getElementById('tags'));
                    var tagSearchInputTimer;
                      function addTag(searchInputId,tagInputId){
                          let searchInput = document.getElementById(searchInputId);
                          tagInput.addValue(searchInput.value);
                          $.ajax({
                            url:"{{route('manage.tag.store')}}",
                            type:"POST",
                            data:{
                                "_token": "{{ csrf_token() }}",
                                name:searchInput.value
                            },
                            success:function(data){
                                //tagInput.addValue(data.name);
                            }
                          });
                          searchInput.value="";
                      }

                      $("#tagSearchInput").on("keyup", function(e) {
                          if(e.keyCode == 13) {
                              addTag('tagSearchInput','tags');
                          }
                          clearTimeout(tagSearchInputTimer);
                          tagSearchInputTimer = setTimeout(function() {
                              var tagSearchList = document.getElementById("tagSearchList");
                              tagSearchList.innerHTML = "";
                              $.ajax({
                                  url: "{{route('manage.tag.search')}}",
                                  type: "GET",
                                  data: {
                                      q: tagSearchInput.value
                                  },
                                  success: function(data) {
                                      for (var i = 0; i < data.length; i++) {
                                          var option = document.createElement("option");
                                          option.value = data[i].name;
                                          option.text = data[i].name;
                                          tagSearchList.appendChild(option);
                                      }
                                  }
                              });
                          }, 300);
                      });
                </script>
                <button type="submit" class="btn btn-primary w-100">{{ __('Create') }}</button>
            </form>
        </div>
    </div>
@endsection
