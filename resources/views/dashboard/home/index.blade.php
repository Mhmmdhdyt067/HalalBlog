
                        @extends('dashboard.main')
                        @section('container.dashboard')
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        <hr class="divider my-0">
                        </div>
                        <table class="table table-striped-columns">
                            <tr>
                            <th>Name</th>
                            <th>{{ auth()->user()->name }}</th>
                            </tr>
                            <tr>
                            <th>Username</th>
                            <th>{{ auth()->user()->username }}</th>
                            </tr>
                            <tr>
                            <th>E-mail</th>
                            <th>{{ auth()->user()->email }}</th>
                            </tr>
                            <tr>
                            <th>Created at</th>
                            <th>{{ auth()->user()->created_at->diffForHumans() }}</th>
                            </tr>
                            <tr>
                            <th>Blog</th>
                            <th>{{ $blogs->count() }} activity</th>
                            </tr>
                        </table>
                        </div>
                        @endsection