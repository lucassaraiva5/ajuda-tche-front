<?php

namespace App\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TermUse extends Component
{
    #[Layout('layouts.app')]
    public function render(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('livewire.use-term', ['terms' => [
            "PROPÓSITO DA APLICAÇÃO" => "Nossa aplicação tem como objetivo principal auxiliar no cadastro e no fornecimento de medidas de auxílio a pessoas afetadas pelas enchentes. Todos os dados coletados serão utilizados exclusivamente para este fim, visando o bem-estar e a assistência dessas pessoas.",
            "COLETA DE DADOS" => "Para fornecer nossos serviços de forma eficaz, coletamos informações pessoais limitadas, como nome, idade, gênero, localização e necessidades específicas para os órgãos proverem assistência. Garantimos que a coleta de dados será feita de forma ética e legal, em conformidade com a legislação aplicável, incluindo a Lei Geral de Proteção de Dados (LGPD).",
            "USO DOS DADOS" => "Todos os dados coletados serão utilizados exclusivamente para o propósito de fornecer medidas de auxílio às pessoas afetadas e cadastradas em nossa aplicação. Os dados não serão compartilhados, vendidos ou utilizados para outros fins que não estejam relacionados ao auxílio às pessoas desabrigadas, exceto quando exigido por lei ou autorizado pelo usuário.",
            "SEGURANÇA DOS DADOS" => "Implementamos medidas de segurança rigorosas para proteger os dados pessoais dos usuários contra acesso não autorizado, uso indevido ou divulgação. Nosso sistema é protegido por criptografia e outras tecnologias de segurança para garantir a confidencialidade e integridade dos dados.",
            "ACESSO AOS DADOS" => "O acesso aos dados coletados é restrito apenas a membros autorizados de nossa equipe, que estão sujeitos a obrigações de confidencialidade, e órgãos governamentais e seus relacionados na prestação de assistência nesse momento de necessidade. Esses membros têm acesso aos dados apenas na medida do necessário para cumprir suas funções relacionadas à prestação de assistência às pessoas afetadas pelas enchentes.",
            "EXCLUSÃO DE DADOS" => "Os dados pessoais dos usuários serão mantidos em nosso sistema apenas pelo período necessário para cumprir os objetivos de prestação de auxílio às pessoas afetadas. Após esse período, os dados serão excluídos de forma segura e permanente, a menos que haja uma obrigação legal ou necessidade legítima de retenção.",
            "DIREITOS DO USUÁRIO" => "Os usuários têm o direito de acessar, corrigir ou excluir seus dados pessoais a qualquer momento. Para exercer esses direitos ou para obter mais informações sobre nossas práticas de privacidade, os usuários podem entrar em contato conosco por meio dos canais de suporte fornecidos na aplicação.",
            "ALTERAÇÕES NOS TERMOS DE USO" => "Reservamo-nos o direito de modificar ou atualizar estes termos de uso periodicamente para refletir mudanças em nossas práticas de privacidade ou na legislação aplicável. Recomendamos que os usuários revisem regularmente os termos de uso para estar cientes de quaisquer alterações."
        ]]);
    }
}
