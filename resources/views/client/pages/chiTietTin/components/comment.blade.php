<div id="review" class="list-group-item px-0 py-2 {{ $class ?? '' }} " style="border: none !important">
    <div class=" d-flex">
        <img src="https://ui-avatars.com/api/?name={{ $comment->user->name }}&background=random" alt=""
            class="rounded-circle avatar-md avatar_vd" />
        <div class="ms-3 mt-2 w-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="mb-0 title_news">
                        {{ $comment->user->name }}{{ Auth()->id() == $comment->user->id ? '  ( Bạn )' : '' }}
                        {!! $name != null ? "<i class='bi bi-caret-right'></i> $name" : '' !!}</h4>
                    <span class="text-muted fs-6 icon_news" data-bs-toggle="tooltip" data-placement="bottom"
                        data-bs-original-title="Thời gian đăng bình luận">
                        <i class="fe fe-clock"></i>
                        {{ $comment->created_at }}
                    </span>
                </div>
            </div>
            <div class="mt-2">
                <p class="mt-2">
                    {{ $comment->content }}
                </p>
                <div>
                    @auth
                        <div class="d-flex gap-5">
                            <a href="#collapseView_{{ $key }}_{{ $keyV ?? '' }}" data-bs-toggle="collapse"
                                role="button" aria-expanded="false"
                                aria-controls="collapseView_{{ $key }}_{{ $keyV ?? '' }}" class="text-warning">
                                <i class="bi bi-reply"></i> {{ $comment->replies->count() }} Câu trả
                                lời</a>
                            <div data-bs-toggle="tooltip"
                                data-placement="bottom"title="Trả lời bình luận của {{ $comment->user->id == Auth()->id() ? 'bạn' : $comment->user->name }}">
                                <a href="#collapseRep_{{ $comment->id }}" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="collapseRep_{{ $comment->id }}"
                                    class="text-primary"><i class="fe fe-message-circle"></i> Trả lời</a>
                            </div>

                            @if (Auth()->user()->id == $comment->user->id)
                                <div data-bs-toggle="tooltip" data-placement="bottom"title="Chỉnh sửa bình luận của bạn">
                                    <a href="#collapseEdit_{{ $comment->id }}" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="collapseEdit_{{ $comment->id }}"
                                        class="text-success"><i class="fe fe-edit"></i> Sửa</a>
                                </div>
                                <div data-bs-toggle="tooltip" data-placement="bottom"title="Xóa bình luận của bạn">
                                    <a onclick="return confirm('Bạn có chắc muốn xóa cmt này không?')"
                                        href="{{ route('comment.delete', $comment->id) }}" class="text-danger"><i
                                            class="fe fe-trash"></i> Xóa</a>
                                </div>
                            @endif
                        </div>
                        {{-- sửa cmt --}}
                        <div class="collapse" id="collapseEdit_{{ $comment->id }}">
                            <div class="card card-body">
                                <form action="{{ route('comment.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $comment->id }}">
                                    <textarea class="form-control" name="content" id="" rows="3" placeholder="Nhập bình luận của bạn">{{ $comment->content }}</textarea>

                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="mt-2">
                                        <button type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseEdit_{{ $comment->id }}" aria-expanded="false"
                                            aria-controls="collapseEdit_{{ $comment->id }}"
                                            class="btn btn-sm btn-outline-danger"><i class="bi bi-x-lg"></i></button>
                                        <button type="submit" class="btn btn-sm btn-outline-primary"><i
                                                class="bi bi-send"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- Rep cmt --}}
                        <div class="collapse" id="collapseRep_{{ $comment->id }}">
                            <div class="card card-body">
                                <form action="{{ route('comment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value=" {{ Auth()->user()->id }} ">
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                    <input type="hidden" name="post_id" value=" {{ $post->id }} ">
                                    <textarea class="form-control" name="content" id="" rows="3" placeholder="Nhập bình luận của bạn">{{ old('content') }}</textarea>

                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="mt-2">
                                        <button type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseRep_{{ $comment->id }}" aria-expanded="false"
                                            aria-controls="collapseRep_{{ $comment->id }}"
                                            class="btn btn-sm btn-outline-danger"><i class="bi bi-x-lg"></i></button>
                                        <button type="submit" class="btn btn-sm btn-outline-primary"><i
                                                class="bi bi-send"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- reply --}}
    <div class="collapse" id="collapseView_{{ $key }}_{{ $keyV ?? '' }}">
        @foreach ($comment->replies as $key => $reply)
            @include('client.pages.chiTietTin.components.comment', [
                'comment' => $reply,
                'post' => $post,
                'class' => 'cmt_reply',
                'keyV' => $key,
                'name' => $comment->user->name,
            ])
        @endforeach
    </div>

</div>
