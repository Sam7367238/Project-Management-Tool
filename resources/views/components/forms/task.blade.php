@csrf

<div>
    <label for="task">Task</label>
    <input type="text" name="task" value="{{ old('task', $task -> task ?? '') }}">
</div>

<div>
    <label for="completed">Completed</label>
    <input type="checkbox" name="completed" @checked(old('completed', $task -> completed ?? ''))>
</div>

<input type="submit" value="Save">