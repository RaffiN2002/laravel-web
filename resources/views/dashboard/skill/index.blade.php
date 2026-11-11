@extends('dashboard.layout')
@section('content')

    <form action="{{ route('skill.update') }}" method="POST" id="skills-form">
        @csrf
        <div class="mb-3">
            <label for="workflow-editor" class="form-label">Skill Description</label>
            <textarea class="form-control" id="workflow-editor" rows="3" name="workflow" required>{!! get_meta_value('workflow') !!}</textarea>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-2">
          <label class="form-label mb-0">Skills</label>
          <button class="btn btn-outline-primary btn-sm" type="button" id="add-skill">Add skill</button>
        </div>
        <div id="skills-list">
          @foreach($skills as $index => $skill)
            <div class="row g-2 mb-2 skill-row align-items-center">
              <div class="col-md-7">
                <input class="form-control" name="skills[{{ $index }}][name]" value="{{ $skill['name'] }}" placeholder="Skill name" required>
              </div>
              <div class="col-md-4">
                <input class="form-range skill-percentage-range" type="range" name="skills[{{ $index }}][percentage]" value="{{ $skill['percentage'] }}" min="0" max="100" required>
                <output class="skill-percentage-value">{{ $skill['percentage'] }}%</output>
              </div>
              <div class="col-auto">
                <button class="btn btn-outline-danger remove-skill skill-remove-button" type="button" aria-label="Remove skill" title="Remove skill"><i class="mdi mdi-trash-can-outline"></i></button>
              </div>
            </div>
          @endforeach
        </div>
          <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>

    <style>
      .skill-row { max-width: 900px; }
      .skill-remove-button {
        width: 40px;
        height: 38px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
      }
      .skill-remove-button i { font-size: 1.1rem; }
      .skill-percentage-value {
        display: inline-block;
        min-width: 42px;
        margin-left: 0.5rem;
      }
    </style>

    @vite('resources/js/skill-editor.js')

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const list = document.getElementById('skills-list');
        const addButton = document.getElementById('add-skill');
        let nextIndex = {{ count($skills) }};

        addButton.addEventListener('click', function () {
          const row = document.createElement('div');
          row.className = 'row g-2 mb-2 skill-row align-items-center';
          row.innerHTML = `
            <div class="col-md-7"><input class="form-control" name="skills[${nextIndex}][name]" placeholder="Skill name" required></div>
            <div class="col-md-4"><input class="form-range skill-percentage-range" type="range" name="skills[${nextIndex}][percentage]" value="75" min="0" max="100" required><output class="skill-percentage-value">75%</output></div>
            <div class="col-auto"><button class="btn btn-outline-danger remove-skill skill-remove-button" type="button" aria-label="Remove skill" title="Remove skill"><i class="mdi mdi-trash-can-outline"></i></button></div>`;
          list.appendChild(row);
          syncPercentage(row);
          nextIndex++;
        });

        function syncPercentage(row) {
          const range = row.querySelector('.skill-percentage-range');
          const output = row.querySelector('.skill-percentage-value');
          if (!range || !output) return;
          const update = () => output.textContent = `${range.value}%`;
          range.addEventListener('input', update);
          update();
        }

        list.querySelectorAll('.skill-row').forEach(syncPercentage);

        list.addEventListener('click', function (event) {
          if (event.target.closest('.remove-skill')) {
            const rows = list.querySelectorAll('.skill-row');
            if (rows.length > 1) event.target.closest('.skill-row').remove();
          }
        });
      });
    </script>
@endsection
