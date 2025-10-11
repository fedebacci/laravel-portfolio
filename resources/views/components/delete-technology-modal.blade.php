<!-- Modal -->
<div class="modal fade" id="{{ 'deleteTechnologyModal' . $technology->id }}" tabindex="-1" aria-labelledby="deleteTechnologyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteTechnologyModalLabel">
            Delete technology #{{ $technology->id }}
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare la tecnologia "{{ $technology->name }}"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
        </button>

        <form action="{{ route('technologies.destroy', $technology) }}" method="POST">
            {{-- token --}}
            @csrf
            {{-- method --}}
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Delete forever
            </button>
        </form>
      </div>
    </div>
  </div>
</div>