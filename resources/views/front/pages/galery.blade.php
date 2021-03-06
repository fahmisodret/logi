@extends('front.layout.index')
@section('css')
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                @foreach($data as $galery)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="project-item galery">
                        <div class="project-item-contents">
                            <a href="{{$galery->image_url}}">
                                <span class="project-item-category">{{$galery->name}}</span>
                            </a>
                        </div>
                        <a href="{{$galery->image_url}}">
                            <img src="{{$galery->image_url}}" alt="Image" class="img-fluid">
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12 col-lg-12 mb-4">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="py-5 bg-primary block-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h3 class="text-white">Subscribe To Newsletter</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, reprehenderit!</p>
          </div>
          <div class="col-lg-6">
            <form action="#" class="form-subscribe d-flex">
              <input type="text" class="form-control form-control-lg">
              <input type="submit" class="btn btn-secondary px-4" value="Subcribe">
            </form>
          </div>
        </div>
      </div>
    </div> --}}

@endsection
@section('js')
@endsection
