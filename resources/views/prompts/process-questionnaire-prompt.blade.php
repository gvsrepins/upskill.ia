Com base nas respostas do questionário a seguir, identifique os principais gaps do profissional e elabore um plano de ação detalhado para melhorar suas competências.

### Informações do profissional:
- **Cargo**: {{ $role }}
- **Senioridade**: {{ ucfirst($seniority) }}

### Respostas do questionário:
@foreach($answers as $question => $answer)
{{ $loop->iteration }}. {{ $question }}: {{ $answer }}/5
@endforeach

### Instruções para a resposta:
1. **Identifique os principais gaps**: Liste os pontos em que o profissional demonstra fragilidade, priorizando os mais críticos.
2. **Gere um plano de ação**: Para cada gap identificado, forneça recomendações práticas e detalhadas para o desenvolvimento do profissional.
O plano deve incluir:
   - **Ações específicas**: Cursos, práticas, estudos recomendados.
   - **Recursos sugeridos**: Links para livros, artigos, vídeos ou tutoriais relevantes.
   - **Tempo estimado de aprimoramento**: Sugestão de prazos realistas para evolução.
   - **Métricas de progresso**: Como avaliar a melhoria ao longo do tempo.

### Formato esperado:
A resposta deve ser estruturada em JSON, no seguinte formato:
{
    "identified_gaps": [
        {
            "competency": "Experiência com PHP para desenvolvimento de aplicações web",
            "current_level": 1,
            "action_plan": {
                "actions": [
                    "Realizar um curso intensivo de PHP moderno.",
                    "Construir um projeto prático para reforçar os conceitos."
                ],
                "suggested_resources": [
                    "https://www.php.net/manual/pt_BR/index.php",
                    "https://laracasts.com/"
                ],
                "estimated_time": "3 meses",
                "progress_metric": "Completar 2 projetos usando PHP puro e frameworks."
            }
        },
        ...
    ]
}

### Requisitos adicionais:
- Não inclua textos genéricos ou irrelevantes.
- Evite redundâncias e foque em soluções práticas e aplicáveis.
- Priorize os gaps mais críticos e relevantes para um profissional do cargo {{$role}} {{ ucfirst($seniority)}}.
- Retorne somente o JSON, sem explicações adicionais.
