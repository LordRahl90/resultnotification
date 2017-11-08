<li class="{{ Request::is('schools*') ? 'active' : '' }}">
    <a href="{!! route('admin.schools.index') !!}"><i class="fa fa-edit"></i> <span>Schools</span></a>
</li>

<li class="{{ Request::is('departments*') ? 'active' : '' }}">
    <a href="{!! route('admin.departments.index') !!}">
        <i class="fa fa-edit"></i>
        <span>Departments</span>
    </a>
</li>

<li class="{{ Request::is('levels*') ? 'active' : '' }}">
    <a href="{!! route('admin.levels.index') !!}">
        <i class="fa fa-edit"></i>
        <span> Levels</span>
    </a>
</li>

<li class="{{ Request::is('students*') ? 'active' : '' }}">
    <a href="{!! route('admin.students.index') !!}">
        <i class="fa fa-edit"></i>
        <span> Students</span>
    </a>
</li>

<li class="{{ Request::is('schoolSessions*') ? 'active' : '' }}">
    <a href="{!! route('admin.schoolSessions.index') !!}">
        <i class="fa fa-edit"></i>
        <span> Sessions</span>
    </a>
</li>

<li class="{{ Request::is('courses*') ? 'active' : '' }}">
    <a href="{!! route('admin.courses.index') !!}"><i class="fa fa-edit"></i><span>Courses</span></a>
</li>

<li class="{{ Request::is('resultProcessings*') ? 'active' : '' }}">
    <a href="{!! route('admin.resultProcessings.index') !!}"><i class="fa fa-edit"></i><span>Result Processings</span></a>
</li>

{{--<li class="{{ Request::is('resultDetails*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.resultDetails.index') !!}"><i class="fa fa-edit"></i><span>Result Details</span></a>--}}
{{--</li>--}}

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

