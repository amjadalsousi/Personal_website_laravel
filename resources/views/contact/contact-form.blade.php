@component('mail::message')

<h3>New Message from {{$contact_form['email']}}</h3>

<p>Name: {{$contact_form['name']}}</p>

<p>Phone: {{$contact_form['phone']}}</p>

<p>Message: {{$contact_form['message']}}</p>    

@endcomponent