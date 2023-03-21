<ul>
    <li>Name : {{$user->name}}</li>
    <li>Email : {{$user->email}}</li>
    <li>City : {{$user->address->city ??'No data found'}}</li>
    <li>PIN Code : {{$user->address->pincode ?? 'No data Found'}}</li>
    <li></li>
</ul>
<hr>
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
    </tr>
    @foreach ($user->orders as $item)
    <tr>
        <td>{{$item->product}}</td>
        <td>{{$item->price}}</td>
    </tr>
    @endforeach
</table>

