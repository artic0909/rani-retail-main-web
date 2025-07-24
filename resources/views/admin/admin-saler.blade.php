

<x-layouts.app :title="__('Add Salers')">
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
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>xyz@gmail.com</td>
            <td>
              <a type="button" class="btn btn-primary">
                Add Manager
              </a>

              <a type="button" class="btn btn-danger">
                Delete
              </a>
            </td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</x-layouts.app>