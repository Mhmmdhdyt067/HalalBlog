<?

namespace App\Enums;

enum Status: string
{
    case Processed = 'Sedang Diproses....';
    case Accepted = 'Diterima';
    case Rejected = 'Ditolak';
}
