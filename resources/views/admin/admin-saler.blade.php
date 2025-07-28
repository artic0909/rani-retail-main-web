<x-layouts.app :title="__('Add Saler')">
  <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
      <table class="w-full overflow-y-auto table-auto table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Saler Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>+
        <tbody>
          @foreach ($salers as $saler)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $saler->name }}</td>
            <td>{{ $saler->email }}</td>
            <td>

              @php
              $isAlreadysaler = \App\Models\Saler::where('email', $saler->email)->exists();
              @endphp

              @if (!$isAlreadysaler)
              <a href="{{ route('store.admin-saler', $saler->id) }}" class="btn btn-warning">
                Add saler
              </a>
              @else
              <button class="btn btn-success">Added</button>
              @endif



              @if($isAlreadysaler)
              <a href="{{ route('remove.admin-saler', $saler->id) }}" class="btn btn-danger">
                Remove saler
              </a>
              @else
              <a href="{{ route('delete.admin-user', $saler->id) }}" class="btn btn-danger">
                Delete
              </a>
              @endif


            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</x-layouts.app>