@extends('layouts')

@section('head')
    @include('cv._head')
@endsection

@section('content')
    <h2>Добавить резюме</h2>
    <form class="form-control" method="POST" action="{{route('cvs.store')}}">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="span-name">Имя</span>
            <input required type="text" class="form-control form-control-sm w-25" id="name-id" name="name" placeholder="Введите имя">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="span-name">e-mail</span>
            <input  required type="text" class="form-control form-control-sm w-25" id="email-id" name="email">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="span-name">Позиция</span>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="position" name="position">
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{$position->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="span-name">Уровень</span>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="programming_level" name="programming_level" required>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">{{$level->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="span-name">Дата</span>
            <input required type="date" class="form-control form-control-sm w-25" id="date" name="date">
        </div>

        <div class="form-group">
            <label for="skills" class="form-label">Ключевые навыки</label>
            <div class="mb-3" id="skills"></div>
            <textarea  id="input-skills" name="skills" required style="display: none"></textarea>
        </div>
        <div class="form-group">
            <label for="cv" class="form-label">Резюме</label>
            <div class="mb-3" id="cv"></div>
            <textarea  id="input-cv" name="cv" required style="display: none"></textarea>
        </div>

        <div class="form-group">
            <label for="experience" class="form-label">Опыт</label>
            <div class="mb-3" id="experience"></div>
            <textarea  id="input-experience" name="experience" required style="display: none"></textarea>
        </div>
        <button class="btn btn-dark" type="submit">Добавить</button>
    </form>

    <script>
        var toolbarOptions = ['bold', 'italic', 'underline', 'strike', 'link', ];
        var cv = new Quill('#cv', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });
        cv.on('text-change', function (delta, oldDelta, source) {
            document.getElementById('input-cv').innerText = (document.getElementById('cv').querySelector('.ql-editor').innerHTML);
        });

        var skills = new Quill('#skills', {
            theme: 'snow'
        });
        skills.on('text-change', function (delta, oldDelta, source) {
            document.getElementById('input-skills').innerText = (document.getElementById('skills').querySelector('.ql-editor').innerHTML);
        });

        var experience = new Quill('#experience', {
            theme: 'snow'
        });
        experience.on('text-change', function (delta, oldDelta, source) {
            document.getElementById('input-experience').innerText = (document.getElementById('experience').querySelector('.ql-editor').innerHTML);
        });
    </script>
    <script>
        const source = document.getElementById('name-id');
        const result = document.getElementById('email-id');

        const inputHandler = function(e) {
            const suffix = '-dev@adict.ru';
            let inp = e.target.value.split(/\s+/);
            if (inp.length > 1) {
                let name = translitirate(inp[0].toLowerCase());
                let surname = translitirate(inp[1].toLowerCase().charAt(0));
                result.value = (name + '.' + surname) + suffix;
            } else {
                let name = inp[0];
                name = translitirate(name.toLowerCase());
                result.value = name + suffix;
            }
        }
        source.addEventListener('input', inputHandler);
        source.addEventListener('change', inputHandler);

        function translitirate(str) {
            const alphabet = {
                'а': 'a',
                'б': 'b',
                'в': 'v',
                'г': 'g',
                'д': 'd',
                'е': 'e',
                'ё': 'e',
                'ж': 'zh',
                'з': 'z',
                'и': 'i',
                'й': 'i',
                'к': 'k',
                'л': 'l',
                'м': 'm',
                'н': 'n',
                'о': 'o',
                'п': 'p',
                'р': 'r',
                'с': 's',
                'т': 't',
                'у': 'u',
                'ф': 'f',
                'х': 'kh',
                'ц': 'ts',
                'ч': 'ch',
                'ш': 'sh',
                'щ': 'shch',
                'э': 'ye',
                'ю': 'yu',
                'я': 'ya',
            }

            let res = '';
            for(let i = 0; i < str.length; i++) {
                if (alphabet[str[i]]) {
                    res += alphabet[str[i]];
                } else {
                    res += str[i];
                }
            }
            return res;
        }
    </script>
@endsection
