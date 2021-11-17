/*
This file contains functions for encrypt form data (pesswords etc.)
*/

/**
 * Encrypt password via SHA-256 hash function
 * @param {string} password - user's password
 * @return {string} Encrypted password
 */
let encryptPassword = (password) => sha256Hash.getHash(password);