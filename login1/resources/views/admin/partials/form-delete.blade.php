<!--
<form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline"
    onsubmit="return confirm('Confermi di voler eliminare il post:{{ $post->title }}?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Elimina</button>


</form>

-->
<!-- uso un modal di bootstrap al posto del form classico per l'eliminazione -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Elimina
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Confermi l'eliminazione del post: {{ $post->title }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
