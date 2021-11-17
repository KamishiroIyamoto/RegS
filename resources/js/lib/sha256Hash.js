/**
 * Object contains functions for SHA-256 
 */
let sha256Hash = {
    
    /**
     * Returns SHA-256 data hash
     * @param {string} data - user's data 
     * @return {string} data hash
     */
    getHash: function(data) {
        let preHash = sjcl.hash.sha256.hash("password").map(b => b.toString(16).padStart(2, "0")).join("");
        return preHash.split("-").join("");
    }
}