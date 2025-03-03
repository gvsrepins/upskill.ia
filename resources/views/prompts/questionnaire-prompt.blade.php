Crie um questionário para avaliar gaps de um profissional no cargo de {{ $role }} - {{$seniority}}.

**Regras do questionário:**
- Deve conter exatamente 10 perguntas.
- As perguntas devem ser equilibradas entre aspectos **técnicos** e **comportamentais** do cargo.
- Todas as perguntas devem ser **objetivas e fechadas**, evitando questões abertas ou subjetivas.
- Cada pergunta deve ser formulada para ser respondida em uma escala de **1 a 5** onde cada item representa:
1. Nenhuma experiência / conhecimento
2. Conhecimento superficial
3. Conhecimento intermediário (já usei, mas não sou especialista)
4. Bom domínio (me sinto confortável, mas sempre há o que aprender)
5. Especialista (posso ensinar isso para outras pessoas)
- Não mencione a escala dentro do texto da pergunta.

**Formato de resposta:**
- Retorne apenas um JSON com as perguntas numeradas de forma sequencial, seguindo o seguinte exemplo:

{
    "1": "Você tem experiência prática com a tecnologia X?",
    "2": "Quão confortável você se sente ao trabalhar sob pressão?",
    "4": "Quão bem você conhece os princípios de Y?",
    ...
}

Não adicione explicações ou qualquer outro texto fora do JSON.
Atenção: O questionário deve refletir as responsabilidades típicas do cargo {{ $role }} - {{$seniority}}, garantindo relevância e precisão.

