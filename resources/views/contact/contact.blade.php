@include('includes.header')

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('contact.send') }}" method='POST'>
        @csrf
        <label for='name'>Name</label>
        <input type='text' id='contact-name' name='contact-name' class='contact-input grey-round-border' required>
        <br>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <label for='email'>E-Mail</label>
        <input type='email' id='contact-email' name='contact-email' class='contact-input grey-round-border' required>
        <br>
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <label for="message">Nachricht</label>
        <textarea id='contact-message' name='contact-message' class='contact-textarea grey-round-border' rows='7' required></textarea>
        <br>
        @error('message')
            <p>{{ $message }}</p>
        @enderror

        <button type='submit' class="submit-button grey-round-border">Senden</button>
    </form>

    @include('includes.footer')