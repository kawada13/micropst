<ul class="list-unstyled">
    @foreach ($microposts as $micropost)
        <li class="media mb-3">
        <img class="mr-2 rounded" src="https://www.kurieisha.com/wp-content/uploads/2021/05/007.jpg" alt="" style="width:120px;">
            <div class="media-body">
                <div>
                     <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}