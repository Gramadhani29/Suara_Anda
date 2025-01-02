<div style="
    background-color: #1a1a2e; 
    color: white; 
    width: 250px; 
    height: 100vh; 
    position: fixed; 
    top: 0; 
    left: 0; 
    box-sizing: border-box;
">
    <div style="padding: 20px; text-align: center;">
        <!-- Nama User -->
        <h3 style="margin: 10px 0;">{{ Auth::user()->name }}</h3>
        <p>{{ Auth::user()->role }}</p> <!-- Menampilkan role, bisa diubah sesuai kebutuhan -->
    </div>
    <ul style="list-style: none; padding: 0; margin: 0;">
        <!-- Tautan untuk User -->
        <li style="margin: 20px 0; text-align: center;">
            <a href="{{ route('user.dashboard') }}" style="color: white; text-decoration: none;">Dashboard</a>
        </li>
        <li style="margin: 20px 0; text-align: center;">
            <a href="/user/pengaduan" style="color: white; text-decoration: none;">Pengaduan</a>
        </li>
        <li style="margin: 20px 0; text-align: center;">
            <a href="/user/konseling" style="color: white; text-decoration: none;">Konseling</a>
        </li>
        <li style="margin: 20px 0; text-align: center;">
            <a href="{{ route('user.artikel') }}" style="color: white; text-decoration: none;">Artikel</a>
        </li>
    </ul>
    <div style="text-align: center; position: absolute; bottom: 20px; width: 100%;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="
                background-color: #ff4d4d; 
                color: white; 
                border: none; 
                padding: 10px 20px; 
                border-radius: 5px; 
                cursor: pointer;
            ">Log Out</button>
        </form>
    </div>
</div>
