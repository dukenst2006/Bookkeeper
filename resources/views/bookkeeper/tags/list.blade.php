<ul class="tags-list">
    @if($tags->count())
        @foreach($tags as $tag)
        <li class="tag">

            <span class="tag__text">
                {!! link_to_route('bookkeeper.tags.overview', $tag->name, $tag->getKey()) !!}
            </span>

            <form action="{{ route('bookkeeper.tags.destroy', $tag->getKey()) }}" method="POST" class="tag__option delete-form">
                {!! method_field('DELETE') . csrf_field() !!}
                <button class="option-delete" type="submit"><i class="tag__icon icon-trash"></i></button>
            </form>

        </li>
        @endforeach
    @else
        <li class="content-message">
            {{ trans('tags.no_tags') }}
        </li>
    @endif
</ul>