<?php

namespace App\Enums;

enum Relation: string
{
    case Father = 'Pai';
    case Mother = 'Mãe';
    case SonDaughter = 'Filho/Filha';
    case Grandfather = 'Avô';
    case Grandmother = 'Avó';
    case GrandsonGranddaughter = 'Neto/Neta';
    case Uncle = 'Tio';
    case Aunt = 'Tia';
    case NephewNiece = 'Sobrinho(a)';
    case Brother = 'Irmão';
    case Sister = 'Irmã';
    case Husband = 'Marido';
    case Wife = 'Esposa';
    case BrotherInLaw = 'Cunhado';
    case SisterInLaw = 'Cunhada';
    case FatherInLaw = 'Sogro';
    case MotherInLaw = 'Sogra';
    case SonInLawDaughterInLaw = 'Genro/Nora';
    case Cousin = 'Primo(a)';
}