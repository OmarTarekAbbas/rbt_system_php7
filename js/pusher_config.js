    // Enable pusher logging - don't include this in production
    //Pusher.logToConsole = true;

    window.pusher = new Pusher('5d23f3205ec6864ac372', {
      cluster: 'eu',
      encrypted:true,
      authEndpoint: window.location.origin+'/rbt_system_php7/broadcasting/auth',
      auth: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        },
      forceTLS: true
    });
