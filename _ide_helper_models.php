<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Categories
 *
 * @property int $cat_id
 * @property string $cat_name
 * @property string $cat_slug
 * @property int $cat_parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] $Productss
 * @property-read int|null $productss_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] $Productsss
 * @property-read int|null $productsss_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereCatName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereCatParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereCatSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereUpdatedAt($value)
 */
	class Categories extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Info
 *
 * @property int $id
 * @property string $cmt
 * @property string $address
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Info newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info query()
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereCmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereUserId($value)
 */
	class Info extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $ord_id
 * @property string $ord_fullname
 * @property string $ord_address
 * @property string $ord_email
 * @property string $ord_phone
 * @property string $ord_total
 * @property int $ord_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderDetail[] $artist
 * @property-read int|null $artist_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderDetail[] $details
 * @property-read int|null $details_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrdAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrdEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrdFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrdPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrdState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrdTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderDetail
 *
 * @property int $ord_detail_id
 * @property string $code
 * @property string $name
 * @property int $price
 * @property int $quantity
 * @property string $image
 * @property int $ord_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereOrdDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereOrdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereUpdatedAt($value)
 */
	class OrderDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Products
 *
 * @property int $prd_id
 * @property string $prd_name
 * @property string $prd_code
 * @property string $prd_slug
 * @property int $prd_price
 * @property int $prd_featured
 * @property int $prd_state
 * @property string $prd_info
 * @property string $prd_describer
 * @property string $prd_image
 * @property int $cat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Categories $Categories
 * @property-read \App\Models\Categories $cate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Categories[] $categoryy
 * @property-read int|null $categoryy_count
 * @property mixed $cat
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdDescriber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrdState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereUpdatedAt($value)
 */
	class Products extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $user_id
 * @property string $user_email
 * @property string $password
 * @property string $user_fullname
 * @property string $user_address
 * @property string $user_phone
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $remember_token
 * @property int $user_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Info|null $info
 * @property-read \App\Models\Info|null $infoWhere
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPhone($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $user_id
 * @property string $user_email
 * @property string $password
 * @property string $user_fullname
 * @property string $user_address
 * @property string $user_phone
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $remember_token
 * @property int $user_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPhone($value)
 */
	class User extends \Eloquent {}
}

