<div class="row">
    <div class="col-md-12 col-sm-12  col-xs-12 col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($comments as $comment)
                        <div class="col-md-2">
                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg"
                                 class="img img-rounded img-fluid"/>
                            <p class="text-secondary text-center">{{ $comment->created_at}}</p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <a class="float-left"
                                   href="users/{{$comment->user->id}} "><strong>{{ $comment->user->name }}
                                        {{ $comment->user->first_name}} {{ $comment->user->last_name}}</strong></a>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                            </p>
                            <div class="clearfix"></div>
                            <p>{{ $comment->body }}</p>
                            <p>
                                <a class="float-right btn btn-outline-primary ml-2"
                                   href="{{ $comment->url }}"> <i class="fa fa-reply"></i>
                                    Link</a>
                                <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i>
                                    Like</a>
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</div>