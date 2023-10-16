<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Producto
 *
 * @property int $id
 * @property string $nombre
 * @property float $precio
 * @property int $cantStock
 * @property string $categoria
 * @property string $tags
 * @property string|null $descripcion
 * @property string|null $infoAdicional
 * @property string|null $valoracion
 * @property int|null $sku
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProductoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCantStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereInfoAdicional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereValoracion($value)
 * @mixin \Eloquent
 */
class Producto extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'producto_user','producto_id','user_id');
    }
}


