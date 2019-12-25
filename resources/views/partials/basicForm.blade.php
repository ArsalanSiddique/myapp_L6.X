        <label>name: <input type="text" name="name" id="" value="{{old('name')}}" />
            <span style="color:red;">{{$message ?? "*"}}</span>
        </label>
        @error('name')
            <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Email: <input type="text" name="email" id="" value="{{old('email')}}" />
            <span style="color:red;">{{$message ?? "*"}}</span>
        </label>
        @error('email')
            <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        
        <!-- @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
        
        @foreach ($errors->get('email') as $message)
            {{$message}}
        @endforeach
         -->
        <label>About yourself: <span style="color:red;">{{$message ?? "*"}}</span><br /><textarea name="content" id="" cols="30" rows="10"></textarea></label>
        @error('content')
            <span style="color:red;">{{$message}}</span>
        @enderror
        <br />