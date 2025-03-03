@php
$answers = [
    'Nenhuma experiência / conhecimento',
    'Conhecimento superficial',
    'Conhecimento intermediário (já usei, mas não sou especialista)',
    'Bom domínio (me sinto confortável, mas sempre há o que aprender)',
    'Especialista (posso ensinar isso para outras pessoas)'
];
@endphp
<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4">
            <div class="relative rounded-xl border p-4 md:p-10 border-neutral-200 dark:border-neutral-700">
                <div class="container w-full md:w-fit">
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div id="progressBar" class="bg-green-500 h-2.5 rounded-full transition-all duration-500" style="width: 0%"></div>
                    </div>

                    <!-- flash error messages -->
                    @if ($errors->any())
                    <div class="mb-2 bg-pink-100 border border-pink-400 text-pink-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Ops! Algo deu errado.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('store-answers') }}" method="post">
                        @csrf

                        <input type="hidden" name="role" value="{{ $role }}">
                        <input type="hidden" name="seniority" value="{{ $seniority }}">

                        @foreach($questions as $key => $question)
                            <div class="question flex flex-col border p-4 md:p-10 rounded-lg shadow-lg bg-white dark:bg-neutral-800 mb-8 hide" data-question="{{ $key }}">
                                <div class="flex flex-col gap-6">
                                    <p class="text-xl md:text-2xl font-bold text-neutral-900 dark:text-neutral-200">{{ $question }}</p>
                                </div>
                                <div class="flex flex-col pt-10">
                                    <div class="flex flex-col">
                                        <div class="grid grid-cols-1 md:grid-cols-5 gap-2 md:gap-4">
                                            @for ($i = 0; $i < 5; $i++)
                                                <label class="flex-1">
                                                    <div class="card flex flex-col items-center text-center border gap-2 md:gap-5 m-2 p-2 md:p-4 has-[input:checked]:bg-gray-200 rounded-lg shadow-md hover:bg-gray-200 dark:hover:bg-neutral-700 text-wrap h-full vertical-center">
                                                        <div>
                                                            <div><strong>{{ $i+1 }}</strong></div>
                                                            <input class="flex" type="radio" name="answers[{{ $question }}]" value="{{ $i }}" {{ old('answer.' . $key) === $i ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="flex flex-col items-center text-wrap">
                                                            <small>{{ $answers[$i] }}</small>
                                                        </div>
                                                    </div>
                                                </label>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="flex flex-col md:flex-row gap-6 justify-center">
                            <button type="button" id="prevBtn" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Anterior</button>
                            <button type="button" id="nextBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 self-end rounded">Próximo</button>
                            <button type="submit" id="submitBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded self-end hide">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let currentQuestion = 0;
        const questions = document.querySelectorAll('.question');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.getElementById('progressBar');

        function showQuestion(index) {
            //hide all questions, except the one with the current index
            questions.forEach((question, i) => {
                question.style.display = i === index ? 'block' : 'none';
            });

            //set defaults
            prevBtn.style.display = 'inline-block',
            nextBtn.style.display =  'inline-block';
            submitBtn.style.display = 'none';

            //hide prev button if first question
            if(isFirstQuestion(index)){
                prevBtn.style.display = 'none';
            }

            //hide next button and show submit button if last question
            if(isLastQuestion(index)){
                nextBtn.style.display =  'none';
                submitBtn.style.display = 'inline-block';
            }

            updateProgressBar(index);
        }

        //register keydown event to navigate through questions
        document.addEventListener('keydown', function(event) {
            if (event.key !== 'Enter') {
                return;
            }

            if (isLastQuestion(currentQuestion)) {
                submitBtn.click();
                return;
            }

            nextBtn.click();
        });

        function isFirstQuestion(index){
            return index === 0;
        }

        function isLastQuestion(index){
            return index === questions.length - 1;
        }

        function updateProgressBar(index) {
            const progress = ((index) / questions.length) * 100;
            progressBar.style.width = progress + '%';
        }

        prevBtn.addEventListener('click', function() {
            if (currentQuestion > 0) {
                currentQuestion--;
                showQuestion(currentQuestion);
            }
        });

        nextBtn.addEventListener('click', function() {
            if (currentQuestion < questions.length - 1) {
                currentQuestion++;
                showQuestion(currentQuestion);
            }
        });

        showQuestion(currentQuestion);
    });
</script>
