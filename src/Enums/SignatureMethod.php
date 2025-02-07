<?php

namespace Anibalealvarezs\OAuthV1\Enums;

enum SignatureMethod: string
{
    case HMAC_SHA1 = 'HMAC-SHA1';
    case HMAC_SHA256 = 'HMAC-SHA256';
    case HMAC_SHA512 = 'HMAC-SHA512';
    case HMAC_MD5 = 'HMAC-MD5';
    case RSA_SHA1 = 'RSA-SHA1';
    case PLAINTEXT = 'PLAINTEXT';
}
