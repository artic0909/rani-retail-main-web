<x-layouts.app :title="__('Stock Managers')">
  <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
      <table class="w-full overflow-y-auto table-auto table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Manager Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($stockManagers as $manager)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $manager->name }}</td>
            <td>{{ $manager->email }}</td>
            <td>

              @php
              $isAlreadyManager = \App\Models\Manager::where('email', $manager->email)->exists();
              @endphp

              @if (!$isAlreadyManager)
              <a href="{{ route('store.admin-stock-manager', $manager->id) }}" class="btn btn-warning">
                Add Manager
              </a>
              @else
              <button class="btn btn-success">Added</button>
              @endif



              @if($isAlreadyManager)
              <a href="{{ route('remove.admin-stock-manager', $manager->id) }}" class="btn btn-danger">
                Remove Manager
              </a>
              @else
              <a href="{{ route('delete.admin-user', $manager->id) }}" class="btn btn-danger">
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