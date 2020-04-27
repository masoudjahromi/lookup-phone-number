## Lookup phone number

This is very simple code for lookup phone number from providers.

I tried to observed `Adapter Design pattern` and `SOLID principles`.

## Brief of Solution

<a href="https://travis-ci.org/laravel/framework"><img src="https://raw.githubusercontent.com/masoudjahromi/lookup-phone-number/master/lookup-phone-number.svg?sanitize=true&raw=true" alt="my solution"></a>

## Challenge

A customer wants to send out a marketing campaign to list of phone numbers provided by them and they ask us to help them in figuring out which of the numbers are actually valid

At our end, to determine the validity of a number we programmatically reach out to one of the providers, which is picked based on pre-defined criteria (mentioned below), if a number is valid(or invalid) all the providers return the same JSON format as a response (because of some amazing cosmic karma)

`{"valid": true|false}`

We have 3 providers: 

| Providers  | Request Scheme |
| ------------- | ------------- |
| BirdPower  | `GET url1/look?number{number}`  |
| Twilight  | `GET url2/look/{number}`  |
| HobbiTel  | `POST url3` with payload `{number: "{number}"`}  |


Even Tough the providers promise us a high rate of availability, there are times when they misbehave (timeout, unexpected response codes - 400, 500s, unexpected response contents after a sudden API change they didn't communicate to us), at those times we fallback to the next provider based on the order defined below:

| Country  | Order |
| ------------- | ------------- |
| Dutch (prefix - 31)  | HobbiTel -> BirdPower -> Twilight  |
| Australian (prefix - 61) | BirdPower -> Twilight -> HobbiTel  |
| Otherwise  | BirdPower -> HobbiTel -> Twilight |

If none of the providers respond, just assume the number to be invalid.
